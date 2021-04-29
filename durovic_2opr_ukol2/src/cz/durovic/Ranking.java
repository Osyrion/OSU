package cz.durovic;

import java.lang.String;

public class Ranking implements Comparable<Ranking> {
    private String name;
    private String lapTime;

    public Ranking(String name, int minutes, int seconds, int milliseconds){
        this.name = name;
        String min = "";
        String sec = "";
        String msc = "";


        if ((minutes >= 0 && minutes < 60)) {
            min = "" + minutes;
        }
        if ((seconds >= 0 && seconds < 60)) {
            sec = "" + seconds;
        }
        if ((milliseconds >= 0 && milliseconds < 1000)) {
            msc = "" + milliseconds;
        }


        if ((minutes - 10) < 0) { min = "0" + min; }
        if ((seconds - 10) < 0) { sec = "0" + sec; }
        if ((milliseconds - 100) < 0) { msc = "0" + msc; }
        if ((milliseconds - 10) < 0) { msc = "00" + msc; }

        this.lapTime = min + ":" + sec + "." + msc;
    }

    @Override
    public String toString() {
        return this.name + " " + this.lapTime;
    }

    @Override
    public int compareTo(Ranking o) {
        return this.lapTime.compareTo(o.lapTime);
    }


}
