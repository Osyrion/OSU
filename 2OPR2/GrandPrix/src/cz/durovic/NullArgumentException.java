package cz.durovic;

public class NullArgumentException extends  IllegalArgumentException {

    public NullArgumentException(String argName) {
        super("Parameter " + argName + " cannot be null.");
    }
}
