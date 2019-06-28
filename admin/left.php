<html>
<?php
header('content-type:text/html;charset=utf-8;');
?>
<body><table>
    <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">软件版本</span></div></td>
                    <td height="20" align="center" bgcolor="#FFFFFF" class="STYLE19">SS3.3
                        <script type="text/javascript" src="http://www.04ie.com/net/phpbook0_3.js"></script></td>
                </tr>
                <tr>
                    <td width="23%" height="20" align="left" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">php版本</span></div></td>
                    <td width="77%" height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo "PHP".PHP_VERSION; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器名：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER['SERVER_NAME']; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器IP：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER["HTTP_HOST"]; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器端口：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER["SERVER_PORT"]; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器时间：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $showtime=date("Y-m-d H:i:s");?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">服务器操作系统：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo PHP_OS; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">站点物理路径：</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo $_SERVER["DOCUMENT_ROOT"]; ?></div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">admin</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">系统管理员</div></td>
                </tr>
                <tr>
                    <td height="20" align="left" bgcolor="#FFFFFF" class="STYLE19"><div align="center">在线使用帮助</div></td>
                    <td height="20" bgcolor="#FFFFFF" class="STYLE19">
                        <div align="center">查看在线帮助文档</div></td>
                </tr>
            </table>
        </td>
    </tr>
    </table>

        </body>
</html>