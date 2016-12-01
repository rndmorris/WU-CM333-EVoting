//Author Ben Ciummo
package votingresultsencryption;
import java.io.*;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.security.InvalidKeyException;
import java.security.Key;
import java.security.NoSuchAlgorithmException;
import javax.crypto.BadPaddingException;
import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.NoSuchPaddingException;
import javax.crypto.spec.SecretKeySpec;

public class VotingResultsEncryption 
{
    public static void main(String[] args) 
            throws FileNotFoundException
    {
        //Checks for valid number of args
        if(args.length < 4)
        {
            System.out.println("VotingResultsEncryption <encrypt|decrypt> <InFile> <OutFile> <16 digit Key>");
            System.exit(1);
        }
        
        String mode = args[0];
        String inFilePath = args[1];
        String outFilePath = args[2];
        String key = args[3];
        File inFile = new File(inFilePath);
        File outFile = new File(outFilePath);
                
        if(mode.toLowerCase().equals("encrypt"))
        {
            System.out.println("Encrypting " + inFile +" with key: "+ key+ " outputting to "+outFile);
            encrypt(key,inFile, outFile);
        }
        else
        {
            System.out.println("Decrypting " + inFile +" with key: "+ key+ " outputting to "+outFile);
            decrypt(key,inFile, outFile);
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
               System.out.println(ex);
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
               System.out.println(ex);
        }
    }
}