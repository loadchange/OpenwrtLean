var process = require("process");
var express = require("express");
var app = express();

const [, , port = 80] = process.argv;

app.get("/", function(req, res) {
  res.send("Hello World!");
});

app.listen(port, function() {
  console.log(`Example app listening on port ${port}!`);
});
