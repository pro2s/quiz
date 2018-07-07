const quizStore = {
    debug: true,
    state: {
        message: "Hello!",
        quizes: [
            {id: 1, name: "Cras justo odio", enable: true},
            {id: 2, name: "Dapibus ac facilisis in", enable: true},
            {id: 3, name: "Morbi leo risus", enable: false},
            {id: 4, name: "Porta ac consectetur ac", enable: true},
            {id: 5, name: "Vestibulum at eros", enable: true},
        ]
    },
    setMessageAction(newValue) {
        if (this.debug) console.log("setMessageAction = ", newValue);
        this.state.message = newValue;
    },
    clearMessageAction() {
        if (this.debug) console.log("clearMessageAction = ");
        this.state.message = "";
    }
};

export default quizStore;