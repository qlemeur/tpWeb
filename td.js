<script>
Person = function(name, age) {
    this.name=name;
    this.age=age;
    this.speak = function(){
        console.log("Im"+this.name+", and i speak english");
    }
}

p=new Person("xxx","5");
p.speak();
p.describe();
</script>