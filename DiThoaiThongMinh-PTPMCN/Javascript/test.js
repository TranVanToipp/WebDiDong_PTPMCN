var list = [1, 2, 3, 4, 5];
 
for (var i = 0, len = list.length; i < len; i += 1) {
    (function(i) {
        setInterval(function() {
            list[i] += 10;
            console.log(i + "=>" + list[i] + "\n");
        }, 5000)
    })(i);
}