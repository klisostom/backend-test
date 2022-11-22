<?php

use Klisostom\BackendTest\Investment\Investment;
use Klisostom\BackendTest\Owner\Owner;

test("An investment's creation date cannot be in the future", function () {
    // Arrange
    $amount = 10;
    $creationDate = date_create(Date("Y-m-d"));
    date_add($creationDate, date_interval_create_from_date_string("1 days"));

    // Act
    $investment = new Investment(ownerId: 1, amount: $amount, creationDate: $creationDate);

    // Assert
    expect(fn () => $investment->isValidDate())->toThrow("An investment's creation date cannot be in the future.");
});

test('An investment should not be or become negative.', function () {
    // Arrange
    $amount = -10;
    $creationDate = date_create(Date("Y-m-d"));

    // Act
    $investment = new Investment(ownerId: 1, amount: $amount, creationDate: $creationDate);

    // Assert
    expect(fn () => $investment->isValidAmount())->toThrow("An investment's amount cannot be negative.");
});

test('create an investment', function () {
    // Arrange
    $amount = 10;
    $creationDate = date_create(Date("Y-m-d"));
    $owner = new Owner(name: "Kalibu Lu", email: "klbu@mail.com");
    $ownerCreated = $owner->create();
    $ownerID = $ownerCreated[0]['id'];

    // Act
    $investment = new Investment(ownerId: $ownerID, amount: $amount, creationDate: $creationDate);
    $investmentCreated = $investment->makeIvestment();

    $query = "SELECT * FROM owner WHERE id={$ownerID}";
    $resultForOwner = pg_fetch_all(pg_query($GLOBALS['conn'], $query));

    $queryInvestment = "SELECT * FROM investment WHERE id={$investmentCreated[0]['id']}";
    $resultForInvestment = pg_fetch_all(pg_query($GLOBALS['conn'], $queryInvestment));

    // Assert
    expect($ownerCreated)->toBe($resultForOwner);
    expect($investmentCreated)->toBe($resultForInvestment);
});
