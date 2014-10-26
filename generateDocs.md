# Generating Docs

Build `structure.xml` file

```
vendor/bin/phpdoc -d ./src -t ./docs --template="xml"
```

Build Markdown from `structure.xml`

```
vendor/gkcgautam/phpdoc-md/bin/phpdocmd ./docs/structure.xml ./docs/ --namespaced_names 0
```

Remove cache files

```
rm -r ./docs/phpdoc-cache-*
rm ./docs/structure.xml
```