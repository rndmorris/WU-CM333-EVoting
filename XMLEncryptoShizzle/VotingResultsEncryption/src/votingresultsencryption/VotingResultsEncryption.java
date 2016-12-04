//Author Ben Ciummo

package votingresultsencryption;

import java.io.*;
import java.io.IOException;
import java.security.InvalidKeyException;
import java.security.Key;
import java.security.NoSuchAlgorithmException;
import javax.crypto.BadPaddingException;
import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.NoSuchPaddingException;
import javax.crypto.spec.SecretKeySpec;
import org.xml.sax.SAXException;

public class VotingResultsEncryption 
{
    public static String Mode;
    public static String InFilePath;
    public static String OutFilePath;
    public static String Key;
    public static File InFile;
    public static File OutFile;
    
    public static void main(String[] args) 
            throws FileNotFoundException,SAXException
    {
        try
        {
            //Checks for valid number of args
            if(args.length != 2 && args.length != 4)
            {
                throw new IllegalArgumentException();
            }
            else if(args.length >=2)
            {
                Mode = args[0].toLowerCase();
                InFilePath = args[1];
                InFile = new File(InFilePath);
                if(args.length == 4)
                {
                    OutFilePath = args[2];
                    Key = args[3];
                    OutFile = new File(OutFilePath);
                }
            }
        
            if(Mode.equals("encrypt"))
            {
                System.out.println("Encrypting " + InFile +" with key: "+ Key+ " outputting to "+OutFile);
                encrypt(Key,InFile, OutFile);
            }
            else if (Mode.equals("decrypt"))
            {
                System.out.println("Decrypting " + InFile +" with key: "+ Key+ " outputting to "+OutFile);
                decrypt(Key,InFile, OutFile);
            }
            else
            {
                throw new IllegalArgumentException();
            }
        }
        catch(IllegalArgumentException ex)
        {
            System.out.println( "VotingResultsEncryption \n"
                              + "<encrypt|decrypt> <InFile> <OutFile> <16 digit Key>");
            System.exit(1);
        }
    }

    private static void encrypt(String inKey, File inFile, File outFile) 
    {
        try
        {
            //Initialize an encryption stream
            Key key = new SecretKeySpec(inKey.getBytes(),"AES");
            Cipher cipher = Cipher.getInstance("AES");
            cipher.init(Cipher.ENCRYPT_MODE, key);
            
            //Pass input file to encryption stream
            FileInputStream inputStream = new FileInputStream(inFile);
            byte[] inputBytes = new byte[(int) inFile.length()];
            inputStream.read(inputBytes);
            byte[] outputBytes = cipher.doFinal(inputBytes);
            
            //Take encrypted output stream and write to byte
            FileOutputStream outputStream = new FileOutputStream(outFile);
            outputStream.write(outputBytes);
            
            //Close Filestreams
            inputStream.close();
            outputStream.close();
        }
        catch(NoSuchPaddingException | NoSuchAlgorithmException
                | InvalidKeyException | IOException 
                | IllegalBlockSizeException| BadPaddingException ex)
        {
               System.out.println(ex.fillInStackTrace());
        }
    }
    
    private static void decrypt(String inKey, File inFile, File outFile)
    {
        try
        {
            Key key = new SecretKeySpec(inKey.getBytes(),"AES");
            Cipher cipher = Cipher.getInstance("AES");
            cipher.init(Cipher.DECRYPT_MODE, key);
            
            FileInputStream inputStream = new FileInputStream(inFile);
            byte[] inputBytes = new byte[(int) inFile.length()];
            inputStream.read(inputBytes);
            byte[] outputBytes = cipher.doFinal(inputBytes);
            
            FileOutputStream outputStream = new FileOutputStream(outFile);
            outputStream.write(outputBytes);
            
            inputStream.close();
            outputStream.close();
        }
        catch(NoSuchPaddingException | NoSuchAlgorithmException
                | InvalidKeyException | IOException 
                | IllegalBlockSizeException| BadPaddingException ex)
        {
               System.out.println(ex.fillInStackTrace());
        }
    }
}