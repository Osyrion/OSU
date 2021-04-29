package cz.durovic;

public class RaceResult implements Comparable<RaceResult> {
    private String name;
    private final String lapTime;

    public RaceResult(String name, int minutes, int seconds, int milliseconds) {
        if (name != null && name.length() != 0) {
            this.name = name;
        }
        if (name != null && name.length() == 0) {
            throw new IllegalArgumentException("Parameter 'name' [RaceResult] is empty.");
        }
        if (name == null) {
            throw new NullArgumentException("'name' [RaceResult]");
        }

        this.lapTime = composeLapTime(minutes, seconds, milliseconds);
    }

    public String composeLapTime(int minutes, int seconds, int milliseconds) {
        String min;
        String sec;
        String msc;
        String ret;

        if (minutes >= 0 && minutes < 60) {
            min = "" + minutes;
        } else {
            throw new IllegalArgumentException("Number '" + minutes + "' [minutes] is out of range (00 - 59).");
        }

        if (seconds >= 0 && seconds < 60) {
            sec = "" + seconds;
        } else {
            throw new IllegalArgumentException("Number '" + seconds + "' [seconds] is out of range (00 - 59).");
        }

        if (milliseconds >= 0 && milliseconds < 1000) {
            msc = "" + milliseconds;
        } else {
            throw new IllegalArgumentException("Number '" + milliseconds + "' [milliseconds] is out of range (000 - 999).");
        }

        if (minutes - 10 < 0) { min = "0" + min; }
        if (seconds - 10 < 0) { sec = "0" + sec; }
        if (milliseconds - 100 < 0) { msc = "0" + msc; }
        if (milliseconds - 10 < 0) { msc = "0" + msc; }

        ret = min + ":" + sec + "." + msc;

        if (ret.equals("00:00.000")) {
            throw new IllegalArgumentException("Illegal lapTime value '" + ret + "'.");
        }

        return ret;
    }

    public String toString() {
        return this.name + "\t" + this.lapTime;
    }

    public int compareTo(RaceResult o) {
        return this.lapTime.compareTo(o.lapTime);
    }

    public String getLapTime() {
        return lapTime;
    }

    public String getName() {
        return name;
    }

}