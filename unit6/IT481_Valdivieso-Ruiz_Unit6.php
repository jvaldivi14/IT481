<?php
class DressingRoom
{
    private $rooms;
    private $semaphore;

    public function __construct($numRooms = 3)
    {
        $this->rooms = $numRooms;
        $this->semaphore = sem_get(ftok(__FILE__, 's'));
    }

    public function accessRoom()
    {
        sem_acquire($this->semaphore); // Acquire the semaphore

        if ($this->rooms > 0) {
            $this->rooms--;
            echo "Customer entered the dressing room. Rooms left: " . $this->rooms . PHP_EOL;
        } else {
            echo "No available dressing rooms." . PHP_EOL;
        }

        sem_release($this->semaphore); // Release the semaphore
    }
}

class Customer
{
    private $numItems;

    public function __construct($numItems = null)
    {
        if ($numItems === null) {
            $this->numItems = rand(1, 10);
        } else {
            $this->numItems = $numItems;
        }
    }

    public function getNumItems()
    {
        return $this->numItems;
    }
}

class Scenario
{
    private $dressingRoom;
    private $customers;

    public function __construct($numRooms, $numCustomers)
    {
        $this->dressingRoom = new DressingRoom($numRooms);
        $this->customers = [];

        for ($i = 0; $i < $numCustomers; $i++) {
            $customer = new Customer();
            $this->customers[] = $customer;
        }
    }

    public function simulate()
    {
        $totalItems = 0;
        $successfulCustomers = 0;

        foreach ($this->customers as $customer) {
            $this->dressingRoom->accessRoom();

            if ($customer->getNumItems() <= $this->dressingRoom->getNumRooms()) {
                $totalItems += $customer->getNumItems();
                $successfulCustomers++;
            }
        }

        echo "Total items tried: " . $totalItems . PHP_EOL;
        echo "Successful customers: " . $successfulCustomers . PHP_EOL;
    }
}

// Create a scenario with 5 dressing rooms and 10 customers
$scenario = new Scenario(5, 10);

// Simulate the scenario
$scenario->simulate();
