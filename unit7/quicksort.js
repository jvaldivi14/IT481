function quickSort(arr) {
    if (arr.length <= 1) {
      return arr;
    }
    
    var pivot = arr[Math.floor(arr.length / 2)];
    var left = [];
    var equal = [];
    var right = [];
    
    for (var i = 0; i < arr.length; i++) {
      if (arr[i] < pivot) {
        left.push(arr[i]);
      } else if (arr[i] === pivot) {
        equal.push(arr[i]);
      } else {
        right.push(arr[i]);
      }
    }
    
    return quickSort(left).concat(equal, quickSort(right));
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
  
  var sortedNumbers = quickSort(numbers);
  
  var endTime = new Date().getTime(); // End time
  
  console.log("Sorted numbers:", sortedNumbers);
  
  var timeTaken = endTime - startTime;
  console.log("Time taken:", timeTaken, "milliseconds");
