function sendRequest(callbacks, configuration) {
    $.ajax({
        url: configuration.url,
        dataType: "json",
        success: function(data) {
            callbacks.checkForInformation(data);
        },
        error: function(data) {
            callbacks.displayErrorMessage();
        },
        timeout: configuration.remainingCallTime
    });
}