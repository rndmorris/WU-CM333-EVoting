//Author Ben Ciummo

package votingresultsencryption;

//import java.awt.RenderingHints.Key;
import java.io.File;
import java.io.*;
import java.util.Arrays;
import java.util.Scanner;
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
        String inFilePath = args[0];
        String outFilePath = args[1];
        String key = args[2];
        File inFile = new File(inFilePath);
        File outFile = new File(outFilePath);
        
        System.out.printf("this is a test input key as first arg and remove hard coded test key");
        System.out.print(inFilePath);
        encrypt("1111111111876789",
                inFile,outFile);
        
    }

    private static void encrypt(String inKey, File inFile, File outFile) 
            throws FileNotFoundException
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
    
    private static void decrypt(String key, String inFile, String outFile)
    {
        
    }
}