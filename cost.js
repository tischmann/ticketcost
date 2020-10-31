'use strict';

const getTicketCost = () => {
    const cost = parseFloat(document.getElementById('cost').value);
    const distance = parseFloat(document.getElementById('distance').value);
    const result = document.getElementById('result');

    const getDiscount = (percentage) => {
        return cost * percentage / 100;
    };

    let totalCost = 0;

    if (distance <= 999) {
        totalCost += cost * distance;
    } else if (distance > 999) {
        totalCost += cost * 999;
    }

    if (distance >= 1000 && distance <= 1999) {
        totalCost += getDiscount(10) * (distance - 999);
    } else if (distance > 1999) {
        totalCost += getDiscount(10) * 1000;
    }

    if (distance >= 2000) {
        totalCost += getDiscount(20) * (distance - 1999);
    }
    
    totalCost = Math.round(totalCost, 2);

    result.innerHTML = `Ticket cost is ${totalCost} TJS`;
};
