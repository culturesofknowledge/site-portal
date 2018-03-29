backup_rotate_store () {
        # $1 = Destination folder
        # $2 = Name of file

        # Keep last seven days.
        # Keep one from each of the last four weeks. (7th,14th,21st,28th)
        # Keep one from each of the past 12 months. (28th)

        local DAY=`date +%A`

        echo mv $1/$2 $1/$DAY.$2

        local DATE=`date +%d`
        if (( $DATE == 7 || $DATE == 14 || $DATE == 21 || $DATE == 28 )); then

                # Weekly backup (*4)
                # rsync -t $1/$DAY.$2 $1/$DATE.$2
                cp --archive $1/$DAY.$2 $1/$DATE.$2

                if (( $DATE == 28 )); then
                        local MONTH=`date +%B`

                        # Monthly backup (*12)
                        #rsync -t $1/$DAY.$2 $1/$MONTH.$2
                        cp --archive $1/$DAY.$2 $1/$MONTH.$2
                fi

        fi
}
