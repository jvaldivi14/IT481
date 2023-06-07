function bubbleSort(arr) {
    var len = arr.length;
    var swapped;
    
    do {
      swapped = false;
      
      for (var i = 0; i < len - 1; i++) {
        if (arr[i] > arr[i + 1]) {
          var temp = arr[i];
          arr[i] = arr[i + 1];
          arr[i + 1] = temp;
          swapped = true;
        }
      }
    } while (swapped);
    
    return arr;
  }
  
  // Test 10 numbers
  var numbers = [5, 3, 8, 4, 2, 9, 1, 7, 6, 10];
  
  // Test 1000 numbers
  /*
  var numbers = [];
  for (var i = 0; i < 1000; i++) {
  numbers.push(Math.floor(Math.random() * 1000));
  }
  */

    // Test 10000 numbers
  /*
  var numbers = [];
  for (var i = 0; i < 10000; i++) {
  numbers.push(Math.floor(Math.random() * 10000));
  }
  */

  console.log("Unsorted numbers:", numbers);
  
  var startTime = new Date().getTime(); // Start time
  
  var sortedNumbers = bubbleSort(numbers);
  
  var endTime = new Date().getTime(); // End time
  
  console.log("Sorted numbers:", sortedNumbers);
  
  var timeTaken = endTime - startTime;
  console.log("Time taken:", timeTaken, "milliseconds");
