// Generated by CoffeeScript 1.6.1
var alias, app_root, dependencies, env, fs, less_path_config, listVendor, path, project_dir, spm_build_config, vendor_list, zonda_vendor_dir;

fs = require("fs");

path = require("path");

listVendor = require("./listVendor");

project_dir = path.resolve('./', '../');

app_root = fs.readFileSync("" + project_dir + "/tool/.app_root", "utf8");

app_root = app_root.replace("\n", "");

zonda_vendor_dir = "vendor/Zonda/vendor";

vendor_list = listVendor("" + project_dir + "/" + zonda_vendor_dir, zonda_vendor_dir);

alias = JSON.stringify(vendor_list.alias);

dependencies = JSON.stringify(vendor_list.dependencies);

env = "seajs.config({\n  base: \"" + app_root + "\",\n  charset: \"utf-8\",\n  alias: " + alias + "\n});";

fs.writeFileSync("" + project_dir + "/etc/env.js", env);

spm_build_config = "{\n    \"name\": \"dist\",\n    \"root\": \"" + app_root + "\",\n    \"dependencies\": " + dependencies + ",\n    \"output\": {\n        \"app.js\" : \".\"\n    }\n}";

fs.writeFileSync("" + project_dir + "/etc/spm_build_config.json", spm_build_config);

less_path_config = "// Path of ROOT\n@root: \"" + app_root + "\";\n\n// Path of images\n@img: \"" + app_root + "/ui/images\";\n\n// Path of FontAwesome Font\n@FontAwesomePath: \"" + app_root + "/vendor/Zonda/ui/less/Font-Awesome/font\";";

fs.writeFileSync("" + project_dir + "/etc/less_path_config.less", less_path_config);
