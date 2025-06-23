Program PosiNega;

{This program prompts the user to enter integers, calculates and prints the sum of the negative and positive numbers and the count of each}
{Created by : Arianna St.John}
{Date : 09/12/2022}

Var
    Numbers, Negative, Positive, NegativeSum, PositiveSum : Integer;
Begin
    Negative := 0;
    Positive := 0;
    NegativeSum := 0;
    PositiveSum := 0;
    Write ('Enter an integer: ');
    Readln (Numbers);
    While Numbers <> 0 Do
    Begin
        If Numbers > 0 
        Then
        Begin
            Positive := Positive + 1;
            PositiveSum := PositiveSum + Numbers
        End
        Else
        Begin
            Negative := Negative + 1;
            NegativeSum := NegativeSum + Numbers;
        End;
        Write ('Enter an integer: ');
        Readln (Numbers);
    End;

    Writeln ('Sum of the positive numbers is: ', PositiveSum);
    Writeln ('The number of positive numbers is: ', Positive);
    Writeln ('Sum of the negative numbers is: ', NegativeSum);
    Writeln ('The number of negative numbers is: ', Negative);
End.