var preventDefaultFunction = function (event) {
    try {
        event.preventDefault();
        event.stopPropagation();
    }
    catch (error) {
        console.error(error);
    }
};

//# sourceMappingURL=core.js.map
