blog
====

A Symfony project created on January 22, 2020, 4:41 pm.



<VirtualHost 0.0.0.0:80>
        DocumentRoot "/Users/pandeydip/Sites/edu-crm/web"
        ServerName educrm.local
        ErrorLog "/private/var/log/apache2/edu_crm_error_log"
        CustomLog "/private/var/log/apache2/edu_crm_access_log" common
        <Directory "/Users/pandeydip/Sites/edu-crm/web">
            AllowOverride All
            Require all granted
        </Directory>
</VirtualHost>
<VirtualHost 0.0.0.0:80>
        DocumentRoot "/Users/pandeydip/Sites/edu-crm/web"
        ServerAlias *.educrm.local
        ErrorLog "/private/var/log/apache2/edu_crm_error_log"
        CustomLog "/private/var/log/apache2/edu_crm_access_log" common
        <Directory "/Users/pandeydip/Sites/edu-crm/web">
            AllowOverride All
            Require all granted
        </Directory>
</VirtualHost>
