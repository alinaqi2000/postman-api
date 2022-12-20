// pre-scripts
var baseUrl = pm.environment.get("baseUrl");
var userEmail = pm.environment.get("userEmail");
var userPassword = pm.environment.get("userPassword");

const options = {
    url: baseUrl,
    method: "POST",
    header: { "content-type": "application/json" },
    body: {
        mode: "raw",
        raw: JSON.stringify({
            email: userEmail,
            password: userPassword,
        }),
    },
};

pm.sendRequest(options, function (err, res) {
    var jsonData = res.json();
    if (err) {
        console.log(err);
    } else {
        pm.environment.set("AuthToken", jsonData.token);
    }
});

pm.environment.set("mean_inps", '[50,60,70,90]');
pm.environment.set("mean_result", 67.5);

// suites
pm.test("[Calculations] Mean - Validate", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.status).to.eql(true);
    pm.expect(jsonData.data.result).to.be.a("number");
});

pm.test("[Calculations] Mean - Calculate", function () {
    var result = pm.collectionVariables.get("mean_result");
    var jsonData = pm.response.json();
    pm.expect(jsonData.data.result).to.eql(result);
});
