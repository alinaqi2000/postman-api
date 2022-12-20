pm.test("[Auth] Login - Status code is 200", function () {
    pm.response.to.have.status(200);
});
pm.test("[Auth] Login - Successfully login", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.status).to.eql(true);
    pm.expect(jsonData.message).to.eql("User Logged In Successfully");    
});