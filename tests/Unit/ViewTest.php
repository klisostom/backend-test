<?php

use Klisostom\BackendTest\Investment\Investment;
use Klisostom\BackendTest\Owner\Owner;

test('Expected balance', function () {
    // Arrange
    $amount = 10;
    $creationDate = date_create(Date("Y-m-d"));
    date_sub($creationDate, date_interval_create_from_date_string("40 days"));
    $owner = new Owner(name: "Kalibu Lu", email: "klbu@mail.com");
    $ownerCreated = $owner->create();
    $ownerID = $ownerCreated[0]["id"];

    $expectedBalance = $amount + ($amount * 0.52);

    // Act
    $investment = new Investment(ownerId: $ownerID, amount: $amount, creationDate: $creationDate);
    $investmentCreated = $investment->makeIvestment();
    $actualInvestment = $investment->balance($ownerID);


    // Assert
    expect($expectedBalance)->toBe($actualInvestment);
    expect((float)$amount)->toBe((float)$investmentCreated[0]['amount']);
});
