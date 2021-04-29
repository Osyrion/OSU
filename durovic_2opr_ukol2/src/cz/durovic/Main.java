package cz.durovic;

import java.util.*;

public class Main {

    public static void main(String[] args) {

        Map<String, List<Ranking>> grandPrix = new HashMap<String, List<Ranking>>();
        List<Ranking> ranking = new ArrayList<>();

        ranking.add(new Ranking("Mika Hakkinen", 1,25,556));

        ranking.add(new Ranking("Alan Prost", 10,55,668));
        ranking.add(new Ranking("Michael Schumacher", 1,26,412));
        ranking.add(new Ranking(null, 5,8,89));
        ranking.add(null);

        grandPrix.put("Monaco2019", ranking);

        //Collections.sort(ranking);

        // System.out.println(Collections.singletonList(grandPrix.get("Monaco2019")));

        //Collection<Ranking> rank = grandPrix.get("Monaco2019");
        //System.out.println(grandPrix.get("Monaco2019").toString());
        //String listed = grandPrix.get("Monaco2019").toString();
        //System.out.println(listed);

        System.out.println(ranking);
/*
        int i = 1;
        System.out.println("Monaco 2019");
        for (Ranking r : ranking) {
            System.out.println(i + "." + " " + r);
            i++;
        }
*/

    }
}
