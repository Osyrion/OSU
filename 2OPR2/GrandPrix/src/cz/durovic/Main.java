package cz.durovic;

import java.util.*;

public class Main {

    public static void main(String[] args) {

        Map<String, RestrictedList<RaceResult>> grandPrix = new HashMap();

        RestrictedList<RaceResult> raceMonaco93 = new RestrictedList<>();
        RestrictedList<RaceResult> raceMonaco19 = new RestrictedList<>();

        try {
            raceMonaco93.add(new RaceResult("Alain Prost", 1, 20,557));
            raceMonaco93.add(new RaceResult("Michael Schumacher", 1, 21, 190));
            raceMonaco93.add(new RaceResult("Ayrton Senna", 1, 21, 552));
            raceMonaco93.add(new RaceResult("Damon Hill", 1, 21, 825));
            raceMonaco93.add(new RaceResult("Jean Alesi", 1, 21,948));
            raceMonaco93.add(new RaceResult("Riccardo Patrese", 1, 22,117));
            raceMonaco93.add(new RaceResult("Gerhard Berger", 1, 22,394));
            raceMonaco93.add(new RaceResult("Karl Wendlinger", 1, 22,477));
            raceMonaco93.add(new RaceResult("Michael Andretti", 1, 22,994));
            raceMonaco93.add(new RaceResult("Érik Comas", 1, 23,246));

            raceMonaco19.add(new RaceResult("Lewis Hamilton", 1, 10, 166));
            raceMonaco19.add(new RaceResult("Valtteri Bottas",1, 10, 252));
            raceMonaco19.add(new RaceResult("Max Verstappen", 1, 10, 641));
            raceMonaco19.add(new RaceResult("Sebastian Vettel", 1, 10, 947));
            raceMonaco19.add(new RaceResult("Pierre Gasly", 1, 10, 41));
            raceMonaco19.add(new RaceResult("Kevin Magnussen", 1, 11, 109));
            raceMonaco19.add(new RaceResult("Daniel Ricciardo", 1, 11, 218));
            raceMonaco19.add(new RaceResult("Daniil Kvyat", 1, 11, 271));
            raceMonaco19.add(new RaceResult("Carlos Sainz Jr.", 1, 11, 417));
            raceMonaco19.add(new RaceResult("Alexander Albon", 1, 11, 653));

        } catch (Exception e) {
            printErrorInfo(e);
        }

        grandPrix.put("Monaco1993", raceMonaco93);
        grandPrix.put("Monaco2019", raceMonaco19);

        System.out.println("\nMonaco 1993");
        grandPrix.get("Monaco1993").sortAndPrint();

        System.out.println("\nMonaco 2019");
        grandPrix.get("Monaco2019").sortAndPrint();


    }

    private static void printErrorInfo(Exception e) {
        System.out.println("\tError type: " + e.getClass().getName());
        System.out.println("\tError message: " + e.getMessage());
    }
}