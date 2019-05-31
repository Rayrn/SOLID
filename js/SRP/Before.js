const guests = ['baLOO', 'chARliE', 'BEth'];

class Greeter {
    static greet(guests) {
        guests.map((guest) => {
            let guestName = guest.toLowerCase();
            guestName = guestName.charAt(0).toUpperCase() + guestName.slice(1);
            document.body.innerHTML += `<p>Hi ${guestName}!</p>`;
        })
    }
}

Greeter.greet(guests);
