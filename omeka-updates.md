Create a new "html[version]" (e.g. html2.6) folder on omk-[blah].

Follow commands on website.
https://omeka.org/classic/docs/Installation/Upgrading/

List of plugins:
baxter:
    Exhibit Builder
    Item Order
    Neatline
    NeatlineFeatures
    Neatline Widget ~ SIMILE Timeline
    Neatline Widget ~ Text
    OpenLayersZoom
    Simple Pages
    Social Bookmarking
    Theme Preview
sw:
    Bulk Metadata Editor
    CSS Editor
    Exhibit Builder
    Geolocation
    Item Order
    OpenLayersZoom
    Simple Pages
    
WEMLO
    Exhibit Builder
    Geolocation
    Neatline
    NeatlineFeatures
    Simple Pages


Switch folders over when finished (if in docker, you'll likely have to restart the service)

Git remove files that have been deleted in new "html" folder

    git ls-files --deleted -z | xargs -t -0 git rm
    
Now commit deleted and updated files

    git commit html
    
Now add the new files (assuming gitignore is still correct)

    git add html
    git commit html
    
Now push

    git push
    
On server.
- Deactivate plugins
-     git pull
-     docker-compose up --build -d
- visit [website]/admin/upgrade
- Reactivate plugins
