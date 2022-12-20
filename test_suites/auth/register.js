pm.test("[Auth] Register - Status code is 200", function () {
    pm.response.to.have.status(200);
});
pm.test("[Auth] Register - Successfully register", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.status).to.eql(true);
    pm.expect(jsonData.message).to.eql("User Created Successfully");    
});