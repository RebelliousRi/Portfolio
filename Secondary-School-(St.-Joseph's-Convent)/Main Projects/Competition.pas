Program Competition ;

{This program prompts the user to input the place that 10 members in the Aripo house came in the event, calculates and prints the total points awarded to the house}
{Created by : Arianna St.John}
{Date : 10/17/2022}

Var
Place : String;
Points, TotalPoints, Members : Integer;
Begin
    TotalPoints := 0;
    For Members := 1 to 10 
    Do
    Begin
        Write ('Enter the place that the members in the Aripo house came in the event: ');
        Readln (Place);
        If Place = '1st'
        Then
            Points := 4
        Else
        If Place = '2nd'
        Then
            Points := 3
        Else
        If Place = '3rd'
        Then
            Points := 2
        Else
        If Place = '4th'
        Then
            Points := 1
        Else
        If Place = '5th'
        Then
            Points := 0;
        TotalPoints := TotalPoints + Points;
    End;
    Writeln ('The total points for Aripo house is: ', TotalPoints);
End.