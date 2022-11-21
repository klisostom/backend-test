<?php

use Klisostom\BackendTest\Investment\Investment;
use Klisostom\BackendTest\Owner\Owner;

test("An investment's creation date cannot be in the future", function () {
    // Arrange
    $amount = 10;
    $creationDate = date_create(Date("Y-m-d"));
    date_add($creationDate, date_interval_create_from_date_string("1 days"));
    $user = new Owner(name: "Nick", email: "temp@mail.com");

    // Act
    $investment = new Investment(owner: $user, amount: $amount, creationDate: $creationDate);

    // Assert
    expect(fn () => $investment->isValidDate())->toThrow("An investment's creation date cannot be in the future.");
});

test('An investment should not be or become negative.', function () {
    // Arrange
    $amount = -10;
    $creationDate = date_create(Date("Y-m-d"));
    $user = new Owner(name: "Nick", email: "temp@mail.com");

    // Act
    $investment = new Investment(owner: $user, amount: $amount, creationDate: $creationDate);

    // Assert
    expect(fn () => $investment->isValidAmount())->toThrow("An investment's amount cannot be negative.");
});

test('create an investment', function () {
    // Arrange
    $amount = 10;
    $creationDate = date_create(Date("Y-m-d"));
    $user = new Owner(name: "Nick", email: "temp@mail.com");
    $userCreated = $user->create();

    // Act
    $investment = new Investment(owner: $user, amount: $amount, creationDate: $creationDate);

    // Assert
    // expect($investment->makeIvestment())->toBeTrue();
});
