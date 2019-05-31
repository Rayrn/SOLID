function awesomeSauce(dispatch) {
  dispatch('awesome/sauce');
}

function awesomeSauceListener(listen) {
  listen('awesome/sauce', () => {
    alert('awesome!');
  });
}
