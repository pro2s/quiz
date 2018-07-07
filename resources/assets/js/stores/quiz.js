const quizStore = {
    debug: true,
    state: {
        message: "Привет!"
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