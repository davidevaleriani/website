#!/bin/bash

if [ -z "$1" ]; then
    echo "Please select the exercise number"
    exit
fi

if [ "$1" -eq "1" ]; then
    python3 ass1.py<<EOF
# Test negative numbers
1
-1
-1
1
2
-1
-1
1
# First test
5
12
# Second test
1
1.5
2
0
EOF
fi

if [ "$1" -eq "2" ]; then
    python3 ass1.py<<EOF
# Test negative numbers
2
-5
# First test
2
14
0
EOF
fi

if [ "$1" -eq "3" ]; then
    python3 ass1.py<<EOF
# Test negative numbers
3
-1
-1
# Values
3
2
3
3
3
5
3
23
3
37
3
1
3
4
3
9
3
12
3
35
0
EOF
fi

if [ "$1" -eq "4" ]; then
    python3 ass1.py<<EOF
# Test negative numbers
4
-1
-1
4
2
-1
-1
# Values
4
3
3
4
6
4
4
7
3
4
5
1
4
3
7
0
EOF
fi

if [ "$1" -eq "5" ]; then
    python3 ass1.py<<EOF
5
hi
5
hi   i     am  bob
5
x y
0
EOF
fi

if [ "$1" -eq "6" ]; then
    python3 ass1.py<<EOF
6
aabaa
6
I
6
aeaaa
6
aaeeeAAA
6
ioio
6
lklklkl
0
EOF
fi

echo "\n\nEND"
