<?php

function findPoint($strArr)
{
    // We convert the first and second input strings into arrays
    // We use explode() to split the string by commas
    // We use array_map('trim', ...) to remove any surrounding whitespace
    $list1 = array_map('trim', explode(',', $strArr[0]));
    $list2 = array_map('trim', explode(',', $strArr[1]));

    // We find common elements (intersection) between the two arrays
    // array_intersect() returns an array containing all values that exist in both arrays
    $common = array_intersect($list1, $list2);

    // We check if any common elements have been found
    // If not, returns 'false' as string
    if (empty($common)) {
        return 'false';
    }

    // If there are common elements, it is joined back into a comma-separated string
    return implode(',', $common);
}

// keep this function call here
// Example:
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']); // Output: 1,4,13
