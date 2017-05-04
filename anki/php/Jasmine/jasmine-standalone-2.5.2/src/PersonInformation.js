function Person() {
  var name = "Ankita Bagade";
};

Person.prototype.getName = function() {
  return name;
} 

Person.prototype.setName = function(name) {
  this.name=name;
}
