<?php

use App\Jobs\SampleJob;

it('processes text by converting it to uppercase', function () {
    // Arrange
    $text = 'hello world';
    $job = new SampleJob($text);

    // Act
    $result = $job->handle();

    // Assert
    expect($result)->toBe('HELLO WORLD');
});