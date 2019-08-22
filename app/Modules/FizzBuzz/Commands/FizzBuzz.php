<?php

namespace Way2Web\Modules\FizzBuzz\Commands;

use Illuminate\Support\Facades\Response;

class FizzBuzz
{
    /**
     * An array consisting of the values corresponding to Fizz, Buzz and FizzBuzz.
     */
    const VALUES = [
        3  => 'Fizz',
        5  => 'Buzz',
        15 => 'FizzBuzz',
    ];

    /**
     * Does the actual FizzBuzz test.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $result = array_map(function ($number) {
            $fizzBuzz = $this->calculateNumber($number);
            return "{$number}{$fizzBuzz}";
        }, range(1, 100));

        return Response::json($result, 200);
    }

    /**
     * Method to return eiher Fizz, Buzz, or FizzBuzz based on a variable.
     *
     * @param int $number
     * @return string
     */
    private function calculateNumber($number)
    {
        switch ($number % 15) {
            case 3:
            case 6:
            case 9:
                return ' Fizz';
                break;

            case 5:
            case 10:
                return ' Buzz';
                break;

            case 0:
                return ' FizzBuzz';
                break;

            default:
                return '';
                break;
        }
    }
}