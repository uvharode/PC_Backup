<?xml version="1.0" ?>
 <xsl:stylesheet version="1.0"  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
   <xsl:template match="/">
     <html>
       <body>
	   <table border="2">
	   <tr>
	   <th>  Name </th>
	   <th>   Account </th>
	   </tr>
         <tr>
		 <td>
          <xsl:value-of select="UserList/User/Name" /><br/>
		 </td>
		 <td>
		  <xsl:value-of select="UserList/User/Account" /><br/>
		 </td>
		 </tr>
		 </table>
       </body>
     </html>
   </xsl:template>
 </xsl:stylesheet>