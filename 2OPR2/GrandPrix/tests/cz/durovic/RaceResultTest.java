package cz.durovic;

import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;

class RaceResultTest {

    @Test
    public void constructorTest() {
        String name = "Mika Hakkinen";
        int mins = 1;
        int secs = 11;
        int msec = 547;
        String expectedTimeFormat = "01:11.547";

        RaceResult race = new RaceResult(name, mins, secs, msec);

        assertEquals(name, race.getName());
        assertEquals(expectedTimeFormat, race.getLapTime());
    }

    @Test
    public void constructorNullNameTest() {
        int mins = 1;
        int secs = 11;
        int msec = 547;

        try {
            RaceResult race = new RaceResult(null, mins, secs, msec);
        } catch (NullArgumentException e) {
            assertTrue(e.getMessage().contains("name"));
        }
    }

    @Test
    public void constructorEmptyNameTest() {
        int mins = 1;
        int secs = 11;
        int msec = 547;

        try {
            RaceResult race = new RaceResult("", mins, secs, msec);
        } catch (IllegalArgumentException e) {
            assertTrue(e.getMessage().contains("name"));
        }
    }

    @Test
    public void constructorZeroTimeTest() {
        String name = "Mika Hakkinen";

        try {
            RaceResult race = new RaceResult(name, 0, 0, 0);
        } catch (IllegalArgumentException e) {
            assertTrue(e.getMessage().contains("lapTime"));
        }
    }

    @Test
    public void constructorRangeTimeTest() {
        String name = "Mika Hakkinen";

        try {
            RaceResult race = new RaceResult(name, 70, 80, 1000);
        } catch (IllegalArgumentException e) {
            assertTrue(e.getMessage().contains("range"));
        }
    }

    @Test
    public void constructorNegativeTimeValueTest() {
        String name = "Mika Hakkinen";

        try {
            RaceResult race = new RaceResult(name, -1, -22, -458);
        } catch (IllegalArgumentException e) {
            assertTrue(e.getMessage().contains("range"));
        }
    }
}
