pm.test("[Index] Request - Validation", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.status).to.eql(true);
});