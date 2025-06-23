Program SquareArea;

{This algorithm prompts the user to input the length of a side of a square, it calculates the area of the square and outputs it}
{Created by : Arianna St.John}
{Date : 01/11/2021}

Var
    Length, Area : Real;
Begin
    Write ('Enter the length of a side of a square: ');
    Readln (Length);
    Area := Length * Length;
    Writeln ('The area of the square is: ', Area : 0 : 2);
End.