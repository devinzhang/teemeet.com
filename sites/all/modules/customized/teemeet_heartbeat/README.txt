启用该模块后，需要将export_files文件夹下的相应类别中的导出文件导入到rules和heartbeat, 并启用相关区块才能使用。

以网站首页上的Site user activity区块为例，要使其显示出来，需要经过如下几步配置：

1.在export_files文件夹下找到site_user_activity目录，进入该目录可以看到两个文件，以"heart-"开头的是导出的heartbeat template文件，需要通过heartbeat的管理界面将其导入到网站；以"rules-"开头的是导出的triggered rules文件，需要通过rules的管理界面将其导入。

2.这两个文件导入之后，需要到区块管理界面启用"Site user activity"区块。在这里可以同时配置一下区块的显示规则，如只显示在首页上等。

3.到用户权限管理界面，将view heartbeat messages权限赋予anonymous user 和 authenticated user。
