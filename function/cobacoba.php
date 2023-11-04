<?php 
function generateRandomNumbers(int $numberOfTerms): array
{
    $randomNumbers = [];

    // Seed the random number generator with the current time.
    mt_srand(microtime(true));

    // Generate 36 random numbers.
    for ($i = 0; $i < $numberOfTerms; $i++) {
        $randomNumbers[] = sprintf("%09d", mt_rand());
    }

    return $randomNumbers;
}



?>