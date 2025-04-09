<?php

function loadEnv($file)
{
    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as $line) {
            $line = trim($line);
            // Skip comments and empty lines
            if ($line === '' || $line[0] === '#') {
                continue;
            }

            // Split the line into key-value pair
            list($key, $value) = explode('=', $line, 2);

            // Remove any surrounding spaces
            $key = trim($key);
            $value = trim($value);

            // Set environment variable
            putenv("$key=$value");
        }
    } else {
        die("No .env file found");
    }
}

// Load the .env file
loadEnv(__DIR__ . '/.env');
