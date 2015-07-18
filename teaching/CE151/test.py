import unittest
from unittest.mock import patch
from io import StringIO

from ass1 import ex1, ex2, ex3, ex4, ex5, ex6


def ex_run(func, inputs):
    with patch("sys.stdin", StringIO("\n".join(inputs))), patch("sys.stdout", new_callable=StringIO) as mocked_out:
        func()
    return(mocked_out.getvalue())


class ExerciseOne(unittest.TestCase):
    def setUp(self):
        self.ex_run = lambda x: ex_run(ex1, x)

    def test1(self):
        print(self.ex_run(['5', '12']))

    def test2(self):
        print(self.ex_run(['1.5', '2']))

    def test3(self):
        print(self.ex_run(['-1', '-1']))


class ExerciseTwo(unittest.TestCase):
    def setUp(self):
        self.ex_run = lambda x: ex_run(ex2, x)

    def test1(self):
        print(self.ex_run(['14']))

    def test2(self):
        print(self.ex_run(['-14']))


class ExerciseThree(unittest.TestCase):
    def setUp(self):
        self.ex_run = lambda x: ex_run(ex3, x)

    def test1(self):
        print(self.ex_run(['-1']))

    def test2(self):
        print(self.ex_run(['2']))
        print(self.ex_run(['3']))
        print(self.ex_run(['5']))
        print(self.ex_run(['23']))
        print(self.ex_run(['37']))

    def test3(self):
        print(self.ex_run(['1']))
        print(self.ex_run(['4']))
        print(self.ex_run(['9']))
        print(self.ex_run(['12']))
        print(self.ex_run(['35']))


class ExerciseFour(unittest.TestCase):
    def setUp(self):
        self.ex_run = lambda x: ex_run(ex4, x)

    def test1(self):
        print(self.ex_run(['0', '0']))

    def test2(self):
        print(self.ex_run(['3', '3']))
        print(self.ex_run(['6', '4']))
        print(self.ex_run(['7', '3']))
        print(self.ex_run(['5', '1']))
        print(self.ex_run(['3', '7']))


class ExerciseFive(unittest.TestCase):
    def setUp(self):
        self.ex_run = lambda x: ex_run(ex5, x)
    
    def test1(self):
        print(self.ex_run(['hi']))
    
    def test2(self):
        print(self.ex_run(['hi  my name   is     bob']))
    
    def test3(self):
        print(self.ex_run(['I']))
 
 
class ExerciseSix(unittest.TestCase):
    def setUp(self):
        self.ex_run = lambda x: ex_run(ex6, x)
    
    def test1(self):
        print(self.ex_run(['aabbbaa']))
    
    def test2(self):
        print(self.ex_run(['aaeeAAA']))
    
    def test3(self):
        print(self.ex_run(['ioio']))
    
    def test4(self):
        print(self.ex_run(['I']))
    
    def test5(self):
        print(self.ex_run(['whtspp']))
 
if __name__ == '__main__':
    unittest.main()
