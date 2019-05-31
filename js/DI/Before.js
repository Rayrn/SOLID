function awesomeSauce(dispatcher) {
  dispatcher.trigger('awesome/sauce');
}

function awesomeSauceListener(dispatcher) {
  dispatcher.on('awesome/sauce', () => {
    alert('awesome!');
  });
}
