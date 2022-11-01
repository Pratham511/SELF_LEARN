
@extends('layouts.auth')
@section('page-content')

    {{-- <button style="margin-top: 20px;margin-left: 20px" type="submit" id="check_button" class="btn btn-primary">Submit</button> --}}

    <?php
        // factotial number 5! = 120
        $num = 12;
        $fact = 1;

        factorial($num,$fact);

        function factorial($num,$fact){
            for($x=$num;$x>1;$x--){
                $fact = $fact * $x;
            }
            echo $fact;
        }
        echo "<br>";


        // fibonacci series 0 1 1 2 3 5 8 13
        $num = 0;
        $num1 = 1;
        $limit = 10;

        echo $num ."  ".$num1;

        fibo($num,$num1,$limit);

        function fibo($num,$num1,$limit){

            for($i = 0;$i<=$limit;$i++){
                $total = $num + $num1;
                echo " " . $total;

                $num = $num1;
                $num1 = $total;
            }
        }
        echo "<br>";


        // Armstrong number 153 = 1*1*1 + 5*5*5 + 3*3*3
        $num = 1153;
        $total = 0;

        Armstrong($num,$total);

        function Armstrong($num,$total){
            $x = $num;
            while($x != 0){
                $rem = $x % 10;
                $total =  $total + $rem*$rem*$rem;
                $x = $x/10;
            }
            if($total == $num){
                echo $num . " is an armstrong number";
            }else{
                echo $num . " is not an armstrong number";
            };
        }
        echo "<br>";


        // Reverese number 153 = 351
        $num = 123456;
        $temp = 0;

        Reverse($num,$temp);

        function Reverse($num,$temp){
            $x = $num;
            while($x > 1){
                $rem = $x % 10;
                $temp = $temp * 10 + $rem;
                $x = $x/10;
            }
            echo $temp;
        }
        echo "<br>";


        // Prime or not
        for($i = 1;$i<=50;$i++){

            $flag = PrimeOrNot($i);

            if($flag == 1){
                echo $i." ";
            }
        }

        function PrimeOrNot($num){
            if($num == 1){
                return 0;
            }
            for($i=2;$i <= $num/2;$i++){
                if($num%$i == 0){
                    return 0;
                }
            }
            return 1;
        }
        echo "<br><br>";


        //print 1
        for($i=1;$i<=8;$i++)
        {
            for($j=1;$j<=15;$j++)
            {
                if($j > 15-2*$i+2)
                {
                    echo "  ";
                }
                else
                {
                    echo "* ";
                }
            }
            echo "<br>";
        }
        echo "<br><br>";


        //print 2
        for($i=1;$i<=8;$i++)
        {
            for($j=1;$j<=8;$j++)
            {
                if($j > 9-$i)
                {
                    echo "  ";
                }
                else
                {
                    echo $j;
                }
            }
            echo "<br>";
        }

        echo "<br><br>";


        // *0
        // ***00
        // ******000
        // **********0000
        // ***************00000

        class MyIterator implements Iterator {
            private $items = [];
            private $pointer = 0;

            public function __construct($items) {
                // array_values() makes sure that the keys are numbers
                $this->items = array_values($items);
            }

            public function current() {
                return $this->items[$this->pointer];
            }

            public function key() {
                return $this->pointer;
            }

            public function next() {
                $this->pointer++;
            }

            public function rewind() {
                $this->pointer = 0;
            }

            public function valid() {
                // count() indicates how many items are in the list
                return $this->pointer < count($this->items);
            }
        }

        // A function that uses iterables
        function printIterable(iterable $myIterable) {
            foreach($myIterable as $item) {
                echo $item;
            }
        }

        // Use the iterator as an iterable
        $iterator = new MyIterator(["a", "b", "c"]);
        printIterable($iterator);
    ?>

@endsection

@section('page-css')

@endsection

@section('page-script')
<script>
    $(document).on('click','#check_button',function (e) {
        e.preventDefault();

        function sum(arr) {
            const reducer = (sum,val) => sum + val;
            const initialValue = 0;
            return arr.reduce(reducer,initialValue)
        }

        sum([1,3,5,7,10])
    })

    let students = [
        { id: "001", name: "Anish", sports: "Cricket" },
        { id: "002", name: "Smriti", sports: "Basketball" },
        { id: "003", name: "Rahul", sports: "Cricket" },
        { id: "004", name: "Bakul", sports: "Basketball" },
        { id: "005", name: "Nikita", sports: "Hockey" }
    ]


    let basketballPlayers = students.filter(function (student) {
        return student.sports === "Basketball";
    }).map(function (student) {
        return student.name;
    })

    let result = basketballPlayers.forEach(function (name){
        console.log(name);
    });  


    // var single_result = result.map(function (val){
    //     console.log(val);
    // })

    // function myFunction(item) {
    //     return item > 9;
    // }

    // const data = ["a","b","c","d","e"];
    // const d = data.fill("f",2,4 );
    // console.log(d);




</script>
@endsection
