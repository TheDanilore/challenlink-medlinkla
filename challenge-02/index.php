<?php

function noIterate($strArr)
{
    $N = $strArr[0]; // The main string where we will search for the smallest window
    $K = $strArr[1]; // The string containing the required characters

    // We build a frequency map for the characters in K
    // This tells us how many times each character should appear in the window    $targetFreq = [];
    foreach (str_split($K) as $char) {
        $targetFreq[$char] = ($targetFreq[$char] ?? 0) + 1;
    }

    // We initialize the sliding window variables
    $windowFreq = [];         // Frequency map for characters in the current window of N
    $have = 0;                // How many unique characters from K are fulfilled in the current window
    $need = count($targetFreq); // Total number of unique characters we need to fulfill
    $left = 0;                // Left pointer of the sliding window
    $minLen = PHP_INT_MAX;    // Length of the smallest valid window found
    $result = "";             // Final result to return (the smallest window substring)

    // Expand the window using the right pointer
    for ($right = 0; $right < strlen($N); $right++) {
        $char = $N[$right]; // Current character at the right pointer

        // Add the character to the window frequency map
        $windowFreq[$char] = ($windowFreq[$char] ?? 0) + 1;

        // If the character is in K and the count in the window matches the required count,
        // it means one required character is fully satisfied
        if (isset($targetFreq[$char]) && $windowFreq[$char] == $targetFreq[$char]) {
            $have++;
        }

        // Attempt to shrink the window on the left while it is valid
        while ($have == $need) {
            // If this window is smaller than any previously found valid window, update the result
            if (($right - $left + 1) < $minLen) {
                $minLen = $right - $left + 1;
                $result = substr($N, $left, $minLen); // Save the smallest valid substring
            }

            // Shrink the window by removing the left pointer character
            $windowFreq[$N[$left]]--;

            // If the removed character is in the target and the window no longer satisfies the requirement,
            // decreases the satisfied character count
            if (isset($targetFreq[$N[$left]]) && $windowFreq[$N[$left]] < $targetFreq[$N[$left]]) {
                $have--;
            }

            // Move the left pointer to the right
            $left++;
        }
    }

    // Return the result: the smallest substring of N containing all characters in K
    return $result;
}

// keep this function call here
// Example
echo noIterate(["ahffaksfajeeubsne", "jefaa"]); // Output: aksfaje
