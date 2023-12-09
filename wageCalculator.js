function calculateWage(wages) {
    const hoursWorked = parseFloat(document.getElementById('hours').value);
    const total = hoursWorked * wages;
    document.getElementById('result').innerText = `You worked ${hoursWorked} hours and will receive $${total.toFixed(2)}`;
  }
  