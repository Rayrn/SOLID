const guests = ['baLOO', 'chARliE', 'BEth'];

class Formatter {
    static sentenceCase(string) {
        const lowerCaseString = this.lowerCase(string);
        const capitalized = this.capitalize(lowerCaseString);

        return capitalized;
    }

    static lowerCase(string) {
        return string.toLowerCase();
    }

    static capitalize(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
}

class Greeter {
    constructor(guests, GreetFormatter = Formatter) {
        this.guests = guests;
        this.formatter = GreetFormatter;
    }

    greet() {
        this.guests.map((guest) => {
            const formattedGuestName = this.formatter.sentenceCase(guest);
            this.sendGreeting(formattedGuestName)
        })
    }

    sendGreeting(name) {
        document.body.innerHTML += `<p>Hi ${name}!</p>`;
    }
}

const eventGreeter = new Greeter(guests);

eventGreeter.greet();
