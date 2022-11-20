<?php

use Klisostom\BackendTest\Investment\Investment;
use Klisostom\BackendTest\User\User;

test("An investment's creation date cannot be in the future", function () {
    // Arrange
    $amount = 10;
    $creationDate = date_create(Date("Y-m-d"));
    date_add($creationDate, date_interval_create_from_date_string("1 days"));
    $user = new User(name: "Nick", email: "temp@mail.com");

    // Act
    $investment = new Investment(user: $user, amount: $amount, creationDate: $creationDate);

    // Assert
    expect(fn() => $investment->invalidDate())->toThrow("An investment's creation date cannot be in the future.");
});
